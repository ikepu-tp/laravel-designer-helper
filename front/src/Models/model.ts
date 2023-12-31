import { ParamIndexType, ResponseIndexType, ResponseType } from './interfaces';
import { Model as defaultModel } from '@ikepu-tp/react-mvc';
import { SuccessOrFailedResponseResource } from '@ikepu-tp/react-mvc/Send';
import { ParamType } from '@ikepu-tp/react-mvc/Url';

export class Model<
	T = any,
	S = any,
	PathParamertsType = { [s: string]: any },
	IndexParamProps = ParamIndexType,
	NormalParamProps = ParamType,
	RequiredParameters = { [s: string]: any }
> extends defaultModel<
	SuccessOrFailedResponseResource,
	PathParamertsType,
	T,
	S,
	S,
	IndexParamProps,
	NormalParamProps,
	NormalParamProps,
	NormalParamProps,
	NormalParamProps,
	RequiredParameters
> {
	protected base_url: string = 'http://localhost/designers';
	protected default_params: ParamType = {};
	protected resourceId_key: string = 'testId';
	protected headers: HeadersInit & { [s: string]: string } = {};
	protected resourceId_param: ParamType | undefined = undefined;

	constructor(
		default_params: ParamType = {},
		default_headers: { [s: string]: string } = {
			Accept: 'application/json',
			'Content-Type': 'application/json',
		}
	) {
		super(default_params, default_headers);
		if (this.url) this.url.setBaseUrl(this.base_url);
	}

	public convertResponse<P = ResponseType<T>>(response: SuccessOrFailedResponseResource | null): P {
		if (response === null) {
			this.convertNullResponse();
			return response as P;
		}
		if (!response) throw new Error('Unexpected response.');
		return response as P;
	}
	public convertNullResponse() {
		//throw new Error('Unexpected response.');
	}

	/**
	 * 一覧リソース
	 *
	 * @param {ParamIndexType} [params={ page: 1, per: 100, order: 'asc' }]
	 * @return {*}  {Promise<ResponseType<ResponseIndexType<T>>>}
	 * @memberof Model
	 */
	public async index<P = ResponseType<ResponseIndexType<T>>, Param = IndexParamProps>(
		params: Param | undefined = undefined
	): Promise<P> {
		return super.index<P>({
			...{},
			page: 1,
			per: 100,
			order: 'asc',
			...(params || {}),
		});
	}

	public setResourceId(id: string): void {
		if (this.resourceId_param === undefined) this.resourceId_param = {};
		this.resourceId_param[this.resourceId_key] = id;
	}

	public revokeResourceId(): void {
		this.resourceId_param = undefined;
	}

	/**
	 * 取得リソース
	 *
	 * @param {T} resource
	 * @return {*}  {Promise<ResponseType<T>>}
	 * @memberof Model
	 */
	public async show<P = ResponseType<T>, Param = NormalParamProps>(param: Param | undefined = undefined): Promise<P> {
		return super.show<P>({ ...{}, ...(this.resourceId_param || {}), ...(param || {}) });
	}

	/**
	 * 作成リソース
	 *
	 * @param {T} resource
	 * @return {*}  {Promise<ResponseType<T>>}
	 * @memberof Model
	 */
	public async store<P = ResponseType<T>, Param = NormalParamProps>(
		resource: S,
		param: Param | undefined = undefined
	): Promise<P> {
		return super.store<P>(resource, {
			...{},
			...(param || {}),
		});
	}

	/**
	 * 更新リソース
	 *
	 * @param {T} resource
	 * @return {*}  {Promise<ResponseType<T>>}
	 * @memberof Model
	 */
	public async update<P = ResponseType<T>, Param = NormalParamProps>(
		resource: S,
		param: Param | undefined = undefined
	): Promise<P> {
		return super.update<P>(resource, {
			...{},
			...(this.resourceId_param || {}),
			...(param || {}),
		});
	}

	/**
	 * 削除リソース
	 *
	 * @param {T} resource
	 * @return {*}  {Promise<ResponseType<T>>}
	 * @memberof Model
	 */
	public async destroy<P = ResponseType<T>, Param = NormalParamProps>(
		resource: T | S | undefined | { [s: string]: any } = undefined,
		param: Param | undefined = undefined
	): Promise<P> {
		return super.destroy<P>(resource, {
			...{},
			...(this.resourceId_param || {}),
			...(param || {}),
		});
	}
}
